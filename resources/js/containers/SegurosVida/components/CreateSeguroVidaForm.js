import React, { useState, useEffect } from 'react';
import { notification, Card, Select } from 'antd';
import Axios from 'axios';
import moment from 'moment';

import { empresa as empresas } from '../../../data/default.json';

export const CreateSeguroVidaForm = ({ reload, setReload }) => {

    const { usuario } = JSON.parse(sessionStorage.getItem('data'));

    const [regimenes, setRegimenes] = useState([]);
    const [zonasLabor, setZonasLabor] = useState([]);
    const [trabajador, setTrabajador] = useState(null);
    const [contratoActivo, setContratoActivo] = useState(null);
    const [rut, setRut] = useState("");
    const [loadingRut, setLoadingRut] = useState(false);
    const [form, setForm] = useState({
        fecha_documento: moment().format("YYYY-MM-DD")
    });

    const fetchZonasLabor = (empresa_id) => {
        if (empresa_id) {
            Axios.get(`/api/zona-labor/${empresa_id}?habilitado=1`)
                .then(res => {
                    setZonasLabor(res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
    const fetchRegimenes = async () => {
        try {
            const { data: { data } } = await Axios.get('http://192.168.60.16/api/regimen');
            setRegimenes(data);
        } catch (err) {
            console.log(err);
        }
    }

    useEffect(() => {
        fetchRegimenes();
    }, []);

    useEffect(() => {
        fetchZonasLabor(contratoActivo?.empresa_id);
    }, [contratoActivo]);

    const handleSubmit = e => {
        e.preventDefault();

        Axios.post('/api/seguros-vida', {
            ...form,
            trabajador: trabajador,
            empresa_id: contratoActivo.empresa_id,
            zona_labor: contratoActivo.zona_id,
            regimen_id: contratoActivo.regimen_id,
            usuario_id: usuario.id
        })
            .then(res => {
                //console.log(res);
                setReload(!reload);
                notification['success']({
                    message: res.data.message
                });
            })
            .catch(err => {
                console.log(err);
                notification['error']({
                    message: 'Error al gurardar el registro'
                });
            });
    }

    const buscarTrabajador = () => {
        setLoadingRut(true);
        Axios.get(`http://192.168.60.16/api/trabajador/${rut}?activo=${false}`)
            .then(res => {
                const { contrato_activo, trabajador } = res.data.data;


                setTrabajador(trabajador);
                setContratoActivo(contrato_activo[0]);

                notification['success']({
                    message: 'Trabajador obtenido'
                });
            })
            .catch(err => {
                setTrabajador(null);
                setContratoActivo(null);
                notification['error']({
                    message: 'No se encontró trabajador'
                });
            })
            .finally(() => setLoadingRut(false));
    }

    return (
        <>
            <Card>
                <div className="row">
                    <div className="col-md-4">
                        RUT:<br />
                        <div className="input-group">
                            <input
                                type="text"
                                className="form-control"
                                name="_rut"
                                autoComplete="off"
                                placeholder="Buscar por RUT"
                                value={rut}
                                onChange={e => setRut(e.target.value)}
                                onKeyPress={e => e.key == 'Enter' ? buscarTrabajador() : null}
                            />
                            <div className="input-group-append">
                                <button
                                    className="btn btn-primary"
                                    type="button"
                                    disabled={loadingRut || rut.length < 8}
                                    onClick={buscarTrabajador}
                                >
                                    {!loadingRut ? (
                                        <i className="fas fa-search"></i>
                                    ) : (
                                        <i className="fas fa-spinner fa-spin"></i>
                                    )}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-4">
                        Trabajador:<br />
                        <input
                            type="text"
                            className="form-control"
                            value={trabajador ? `${trabajador.apellido_paterno} ${trabajador.apellido_materno} ${trabajador.nombre}` : ''}
                            disabled={true}
                        />
                    </div>
                    <div className="col-md-4">
                        Empresa:<br />
                        <select
                            className="form-control"
                            value={contratoActivo ? contratoActivo.empresa_id : 0}
                            disabled
                        >
                            <option key={0} value={0}>

                            </option>
                            {empresas.map(item => (
                                <option key={item.id} value={item.id}>
                                    {`${item.id} - ${item.name}`}
                                </option>
                            ))}
                        </select>
                    </div>
                    {/* <div className="col-md-4">
                        Fecha Documento:<br />
                        <input
                            type="date"
                            className="form-control"
                            value={form.fecha_documento}
                            onChange={e => setForm({ ...form, fecha_documento: e.target.value })}
                        />
                    </div> */}
                    <div className="col-md-4">
                        <span>Régimen:</span><br />
                        <Select
                            value={contratoActivo?.regimen_id}
                            disabled
                            size="small"
                            showSearch
                            optionFilterProp="children"
                            filterOption={(input, option) =>
                                option.children
                                    .toLowerCase()
                                    .indexOf(input.toLowerCase()) >= 0
                            }
                            style={{
                                width: '100%',
                            }}
                        >
                            {regimenes.map(e => (
                                <Select.Option value={e.id} key={e.id}>
                                    {`${e.id} - ${e.name}`}
                                </Select.Option>
                            ))}
                        </Select>
                    </div>
                    <div className="col-md-4">
                        <span>Zona Labor:</span><br />
                        <Select
                            value={contratoActivo?.zona_id}
                            disabled
                            size="small"
                            showSearch
                            optionFilterProp="children"
                            filterOption={(input, option) =>
                                option.children
                                    .toLowerCase()
                                    .indexOf(input.toLowerCase()) >= 0
                            }
                            style={{
                                width: '100%',
                            }}
                        >
                            {zonasLabor.map(e => (
                                <Select.Option value={e.id} key={e.id}>
                                    {`${e.id} - ${e.name}`}
                                </Select.Option>
                            ))}
                        </Select>
                    </div>
                </div>
                <div className="row mt-4">
                    <div className="col-md-12">
                        <button
                            type="submit"
                            className="btn btn-primary btn-block"
                            onClick={handleSubmit}
                            disabled={!trabajador && !contratoActivo}
                        >
                            Enviar
                        </button>
                    </div>
                </div>
            </Card>
            <br />
            <div className="row">
                <div className="col">
                    <a
                        className="btn btn-primary mr-3"
                        href="/storage/Declaracion Beneficiarios Vida Ley.pdf"
                        target="_blank"
                    >
                        <i className="fas fa-file-alt"></i> Descargar Formato
                    </a>
                </div>
            </div>
        </>
    );
}
