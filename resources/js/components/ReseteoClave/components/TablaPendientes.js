import React, { useState, useEffect } from 'react';
import moment from 'moment';
import { DatePicker, message, Select, Input } from 'antd';
import { TablaR } from './TablaR';
import Axios from 'axios';
import Swal from 'sweetalert2';

import Modal from '../../Modal';

export const TablaPendientes = ({ reloadDatos, setReloadDatos }) => {
    const { usuario } = JSON.parse(sessionStorage.getItem('data'));
    const [filtro, setFiltro] = useState({
        desde: moment().format('YYYY-MM-DD').toString(),
        hasta: moment().format('YYYY-MM-DD').toString(),
        estado: 0,
        usuario_carga_id: 0,
        rut: '',
    });
    const [isVisible, setIsVisible] = useState(false);
    const [modalContent, setModalContent] = useState(null);
    const [usuariosCarga, setUsuariosCarga] = useState([]);
    const [data, setData] = useState([]);

    const handleExportar = () => {
        const headings = [
            'FECHA SOLICITUD',
            'HORA',
            'RUT',
            'TRABAJADOR',
            'EMPRESA',
            'CARGADO POR',
            'CLAVE SUGERIDA',
            'ATENDIDO POR',
        ];
        const d = data.map(item => {
            return {
                fecha_solicitud: item.fecha_solicitud,
                hora: item.hora,
                dni: item.rut,
                trabajador: item.nombre_completo,
                empresa: item.empresa,
                cargado_por: item?.nombre_completo_usuario || '',
                clave: (filtro.estado == 0 && usuario.reseteo_clave == 1) ? '' : item.clave,
                atendido_por: item?.nombre_completo_usuario2 || '',
            }
        });

        Axios({
            url: '/descargar',
            data: {headings, data: d},
            method: 'POST',
            responseType: 'blob'
        })
            .then(response => {
                console.log(response);
                let blob = new Blob([response.data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' })
                let link = document.createElement('a')
                link.href = window.URL.createObjectURL(blob)
                link.download = `RESETEO-CLAVE-${filtro.estado == 0 ? "PENDIENTES" : "ATENDIDOS"}-${filtro.desde}-${filtro.hasta}.xlsx`
                link.click();
            })
    }

    const handleEliminar = id => {
        Swal.fire({
            title: '¿Deseas eliminar este registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrarlo',
            cancelButtonText: 'Cancelar'
        })
            .then(result => {
                if (result.value) {
                    Axios.delete(`/api/atencion-reseteo-clave/${id}`)
                        .then(res => {
                            Swal.fire({
                                title: res.data.message,
                                icon: res.status < 400 ? 'success' : 'error'
                            })
                                .then(() => setReloadDatos(!reloadDatos));
                        })
                        .catch(err => {
                            console.log(err);
                            Swal.fire({
                                title: 'Error al borrar el registro',
                                icon: 'error'
                            });
                        });
                }
            });
    }

    const handleResolver = id => {
        Axios.put(`/api/atencion-reseteo-clave/resolver/${id}`, {
            usuario_id: usuario.id
        })
            .then(res => {
                Swal.fire({
                    title: res.data.message,
                    icon: res.status < 400 ? 'success' : 'error'
                })
                    .then(() => setReloadDatos(!reloadDatos));
            })
            .catch(err => {
                console.error(err);
            });
    }

    const handleVerCambio = item => {
        console.log(item);
        setIsVisible(true);
        setModalContent(
            <div className="container">
                Nueva clave: <b>{item.clave}</b><br />
                Atendido por: <b>{item.nombre_completo_usuario2}</b>
            </div>
        );
    }

    useEffect(() => {
        function fetchData() {
            Axios.post('/api/atencion-reseteo-clave/get-all', {
                usuario_id: usuario.id,
                usuario_carga_id: filtro.usuario_carga_id,
                desde: filtro.desde,
                hasta: filtro.hasta,
                estado: filtro.estado,
                rut: filtro.rut,
            })
                .then(res => {
                    message['success']({
                        content: `Se encontraron ${res.data.length} registros`
                    });

                    const atenciones = res.data.map(item => {
                        return {
                            ...item,
                            key: item.id
                        }
                    });

                    setData(atenciones);
                })
                .catch(err => console.error(err));
        }

        if (filtro.rut === '' || filtro.rut.length >= 8) {
            fetchData();
        }
    }, [filtro.desde, filtro.hasta, filtro.estado, filtro.usuario_carga_id, filtro.rut, reloadDatos]);

    useEffect(() => {
        setFiltro({ ...filtro, usuario_carga_id: 0 });
        let intentos = 0;
        function fetchUsuariosCarga() {
            intentos++;
            Axios.post('/api/atencion-reseteo-clave/get-usuarios-carga', {
                desde: filtro.desde,
                hasta: filtro.hasta,
                estado: filtro.estado
            })
                .then(res => setUsuariosCarga(res.data))
                .catch(err => {
                    if (intentos < 5) {
                        fetchUsuariosCarga();
                    }
                    console.error(err)
                });
        }

        fetchUsuariosCarga();
    }, [filtro.desde, filtro.hasta, filtro.estado, reloadDatos]);

    return (
        <>
            <div className="row">
                <div className="col-md-4">
                    Desde - Hasta:<br />
                    <DatePicker.RangePicker
                        placeholder={['Desde', 'Hasta']}
                        style={{ width: '100%' }}
                        onChange={(date, dateString) => {
                            setFiltro({
                                ...filtro,
                                desde: dateString[0],
                                hasta: dateString[1],
                            });
                        }}
                        value={[moment(filtro.desde), moment(filtro.hasta)]}
                    />
                </div>
                <div className="col-md-4">
                    Estado:<br />
                    <Select
                        value={filtro.estado}
                        showSearch
                        optionFilterProp="children"
                        filterOption={(input, option) =>
                            option.children
                                .toLowerCase()
                                .indexOf(input.toLowerCase()) >= 0
                        }
                        onChange={e => setFiltro({ ...filtro, estado: e })}
                        style={{
                            width: '100%',
                        }}
                    >
                        <Select.Option value={0} key="0">PENDIENTES</Select.Option>
                        <Select.Option value={1} key="1">ATENDIDOS</Select.Option>
                    </Select>
                </div>
                {usuario.reseteo_clave == 2 && (
                    <div className="col-md-4">
                        Cargado por:<br />
                        <Select
                            value={filtro.usuario_carga_id}
                            showSearch
                            optionFilterProp="children"
                            filterOption={(input, option) =>
                                option.children
                                    .toLowerCase()
                                    .indexOf(input.toLowerCase()) >= 0
                            }
                            onChange={e => setFiltro({ ...filtro, usuario_carga_id: e })}
                            style={{
                                width: '100%',
                            }}
                        >
                            <Select.Option value={0} key="0"><b>TODOS</b></Select.Option>
                            {usuariosCarga.map(option => <Select.Option value={option.id} key={option.id}>{ `${option.nombre_completo}` }</Select.Option>)}
                        </Select>
                    </div>
                )}
                <div className="col-md-4">
                    Buscar por RUT:<br />
                    <Input
                        placeholder="Mínimo 8 caracteres"
                        value={filtro.rut}
                        onChange={e => setFiltro({ ...filtro, rut: e.target.value })}
                        allowClear
                    />
                </div>
            </div>
            <br />
            <div className="row">
                <div className="col-md-4">
                    <button className="btn btn-success btn-sm" onClick={handleExportar}>
                        <i className="fas fa-file-excel" /> Exportar
                    </button>
                </div>
            </div>
            <br />
            <TablaR
                data={data}
                filtro={filtro}
                handleEliminar={handleEliminar}
                handleVerCambio={handleVerCambio}
                handleResolver={handleResolver}
                setReloadDatos={setReloadDatos}
                reloadDatos={reloadDatos}
            />
            <Modal
                title="Cambio de clave"
                isVisible={isVisible}
                setIsVisible={setIsVisible}
            >
                {modalContent}
            </Modal>
        </>
    );
}