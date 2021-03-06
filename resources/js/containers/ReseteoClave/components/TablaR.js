import React, { useState, useEffect } from 'react';
import moment from 'moment';
import { Table, Checkbox, Tooltip, message } from 'antd';
import Axios from 'axios';



const Acciones = ({
    record,
    usuario,
    handleEliminar,
    handleResolver,
    handleVerCambio,
}) => {
    return (
        <div className="btn-group">
            {record.estado == 0 ? (
                <>
                    {record.restringido === 1 ? (
                        (usuario.reseteo_clave == 3) && (
                            <Tooltip title="Marca como ATENDIDO">
                                <button className="btn btn-outline-primary btn-sm" onClick={() => handleResolver(record.id)}>
                                    <i className="fas fa-check"/>
                                </button>
                            </Tooltip>
                        )
                    ) : (
                        (usuario.reseteo_clave == 2 || usuario.reseteo_clave == 3) && (
                            <Tooltip title="Marca como ATENDIDO">
                                <button className="btn btn-outline-primary btn-sm" onClick={() => handleResolver(record.id)}>
                                    <i className="fas fa-check"/>
                                </button>
                            </Tooltip>
                        )
                    )}
                    <button className="btn btn-danger btn-sm" onClick={() => handleEliminar(record.id)}>
                        <i className="fas fa-trash-alt" />
                    </button>
                </>
            ) : (
                <button className="btn btn-light btn-sm" onClick={() => handleVerCambio(record)}>
                    <i className="fas fa-eye" /> Clave
                </button>
            )}
        </div>
);
}

export const TablaR = ({
    data,
    filtro,
    handleEliminar,
    handleResolver,
    handleVerCambio,
    setReloadDatos,
    reloadDatos
}) => {
    const { usuario } = JSON.parse(sessionStorage.getItem('data'));

const getColumns = (
    usuario,
    handleEliminar,
    handleResolver,
    handleVerCambio,
) => {
    if (usuario.reseteo_clave == 1) {
        return [
            {
                title: 'Fecha Solicitud',
                dataIndex: 'fecha_solicitud'
            },
            {
                title: 'Hora',
                dataIndex: 'hora'
            },
            {
                title: 'RUT',
                dataIndex: 'rut',
            },
            {
                title: 'Trabajador',
                dataIndex: 'nombre_completo',
            },
            {
                title: 'Empresa',
                dataIndex: 'empresa',
            },
            {
                title: 'Acciones',
                dataIndex: 'acciones',
                render: (_, record) => (
                    <Acciones
                        usuario={usuario}
                        record={record}
                        handleEliminar={handleEliminar}
                        handleResolver={handleResolver}
                        handleVerCambio={handleVerCambio}
                    />
                )
            }
        ];
    } else {
        return [
            {
                title: 'Fecha Solicitud',
                dataIndex: 'fecha_solicitud'
            },
            {
                title: 'Hora',
                dataIndex: 'hora'
            },
            {
                title: 'RUT',
                dataIndex: 'rut',
            },
            {
                title: 'Trabajador',
                dataIndex: 'nombre_completo',
            },
            {
                title: 'Oficio',
                dataIndex: 'oficio'
            },
            {
                title: 'Regimen',
                dataIndex: 'regimen'
            },
            {
                title: 'Empresa',
                dataIndex: 'empresa',
            },
            {
                title: '# Desbloqueos',
                dataIndex: 'cantidad_registros'
            },
            {
                title: 'Cargado por',
                dataIndex: 'nombre_completo_usuario',
            },
            {
                title: 'Clave sugerida',
                dataIndex: 'clave'
            },
            {
                title: 'Contacto',
                dataIndex: 'numero_telefono_trabajador'
            },
            {
                title: 'Acciones',
                dataIndex: 'acciones',
                render: (_, record) => (
                    <Acciones
                        usuario={usuario}
                        record={record}
                        handleEliminar={handleEliminar}
                        handleResolver={handleResolver}
                        handleVerCambio={handleVerCambio}
                    />
                )
            }
        ];
    }
}

    const [selectedRowKeys , setSelectedRowKeys] = useState([]);
    const [loading, setLoading] = useState(false);

    const notAvalible = () => {
        message['warning']({
            content: 'Función aún no disponible'
        });
    }

    const handleMassiveResolver = () => {
        function resolver(id) {
            Axios.put(`/api/atencion-reseteo-clave/resolver/${id}`, { usuario_id: usuario.id })
                .then(res => {
                    setReloadDatos(!reloadDatos);
                })
                .catch(err => console.error)
        }

        function resolverTodos(ids) {
            return ids.reduce((p, id) => {
                return p.then(() => resolver(id));
            }, Promise.resolve());
        };

        resolverTodos(selectedRowKeys);
        setSelectedRowKeys([]);
    }

    const onSelectChange = selectedRowKeys => {
        setSelectedRowKeys(selectedRowKeys);
    };

    const rowSelection = {
        selectedRowKeys,
        onChange: onSelectChange,
    };
    const hasSelected = selectedRowKeys.length > 0;

    return (
        <div>
            <div style={{ marginBottom: 16 }}>
                {(hasSelected && filtro.estado == 0 && (usuario.reseteo_clave === 2 || usuario.reseteo_clave === 3)) && (
                    <button className="btn btn-primary" disabled={loading} onClick={handleMassiveResolver}>
                        {loading ? (
                            <>
                                <span className="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span className="sr-only">Cargando...</span>
                            </>
                        ) : 'Marcar como ATENDIDO'}
                    </button>
                )}
                <span style={{ marginLeft: 8 }}>
                    {hasSelected ? `${selectedRowKeys.length} item(s) seleccionados` : ''}
                </span>
            </div>
            <Table
                /* rowSelection={rowSelection} */
                columns={getColumns(usuario, handleEliminar, handleResolver, handleVerCambio)}
                dataSource={data}
                bordered
                rowClassName={(record, index) => record.restringido === 1 && 'table-row-warning'}
                scroll={{ x: 1000 }}
                size="small"
            />
        </div>
    );
}
