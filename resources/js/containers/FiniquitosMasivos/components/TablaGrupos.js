import React, { useState, useEffect } from 'react';

import { Button, Table, Tooltip, Tag, Modal, notification } from 'antd';
import Axios from 'axios';

export const TablaGrupo = ({ reload, setReload }) => {

    const { usuario, submodule } = JSON.parse(sessionStorage.getItem('data'));

    const [grupos, setGrupos] = useState([]);
    const [loading, setLoading] = useState(false);

    const columns = [
        {
            title: 'Código',
            dataIndex: 'id'
        },
        {
            title: 'Fecha Finiquito',
            dataIndex: 'fecha_finiquito'
        },
        {
            title: 'Zona Labor',
            dataIndex: 'zona_labor'
        },
        {
            title: 'Ruta',
            dataIndex: 'ruta'
        },
        {
            title: 'Código Bus',
            dataIndex: 'codigo_bus'
        },
        {
            title: '# Registros',
            dataIndex: 'cantidad_registros'
        },
        {
            title: 'Creado Por',
            dataIndex: 'usuario',
            render: (_, value) => `${_.username}`
        },
        {
            title: 'Estado',
            dataIndex: 'estado',
            render: (record) => <Tag color={record.color}>{record.name}</Tag>
        },
        {
            title: 'Acciones',
            dataIndex: 'acciones',
            render: (_, value) => (
                <Button.Group
                    size="small"
                >
                    <Tooltip title="Editar Informe">
                        <Button type="primary" onClick={e => redirectToDetail(value.id)}>
                            <i className="fas fa-edit"></i>
                        </Button>
                    </Tooltip>
                    {/* <Tooltip title="Exportar Registros">
                        <Button type="success" style={{ backgroundColor: '#3FB618', borderColor: '#3FB618', color: 'white' }}>
                            <i className="fas fa-file-excel"></i>
                        </Button>
                    </Tooltip> */}
                    {value.estado.name !== 'ANULADO' && (
                        <Tooltip title="Anular Informe">
                            <Button type="danger" onClick={() => confirmDelete(value.id)}>
                                <i className="fas fa-ban"></i>
                            </Button>
                        </Tooltip>
                    )}
                </Button.Group>
            )
        },
    ];

    const confirmDelete = (id) => {
        Modal.confirm({
            title: "Anular grupo",
            content: "¿Desea anular el grupo de finiquitos?",
            okText: "Si, ANULAR",
            cancelText: "Cancelar",
            onOk: () => softDelete(id)
        });
    }

    const softDelete = (id) => {
        setReload(!reload);
        Axios.delete(`/api/grupos-finiquitos/${id}`)
            .then(res => {
                console.log(res);

                notification['success']({
                    message: res.data.message
                });
            })
            .catch(err => {
                console.error(err);
            })
            .finally(() => setReload(!reload));
    }

    const redirectToDetail = (id) => {
        window.location.replace(`/finiquitos/${id}`);
    };

    useEffect(() => {
        setLoading(true);
        Axios.get(`/api/grupos-finiquitos?usuario_id=${usuario.id}`)
            .then(res => {
                setGrupos(res.data.data.map(item => {
                    return { ...item, key: item.id };
                }));
            })
            .catch(err => {
                console.error(err);
            })
            .finally(() => setLoading(false));
    }, [reload]);

    return (
        <Table
            bordered
            columns={columns}
            size="small"
            scroll={{ x: 1100 }}
            dataSource={grupos}
            loading={loading}
        />
    );
}
