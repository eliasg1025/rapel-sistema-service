import React from "react";
import ReactDOM from "react-dom";
import { Layout, Menu } from "antd";
import {UploadOutlined, UserOutlined, HomeOutlined, LogoutOutlined} from '@ant-design/icons';
import moment from 'moment';

const { Header, Content, Footer, Sider } = Layout;

import Trabajadores from "../pages/Trabajadores";

import 'antd/dist/antd.css';

const TrabajadoresLayout = props => {
    const data = JSON.parse(props.props);
    return (
        <Layout>
            <Sider
                theme="light"
                breakpoint="lg"
                collapsedWidth="0"
                onBreakpoint={broken => {
                    //console.log(broken);
                }}
                onCollapse={(collapsed, type) => {
                    //console.log(collapsed, type);
                }}
            >
                <br />
                <Menu mode="inline" defaultSelectedKeys={['3']}>
                    <Menu.Item key="1" icon={<HomeOutlined />}>
                        <a href="/ingresos">
                            Inicio
                        </a>
                    </Menu.Item>
                    <Menu.Item key="3" icon={<UploadOutlined />}>
                        <a href="/trabajadores">
                            Trabajadores
                        </a>
                    </Menu.Item>
                    <Menu.Item key="4" icon={<UserOutlined />}>
                        <a href="/registro-individual">
                            Registro Individual
                        </a>
                    </Menu.Item>
                    <Menu.Item key="5" icon={<UserOutlined />}>
                        <a href="/registro-masivo">
                            Registro Masivo
                        </a>
                    </Menu.Item>
                    <Menu.Item key="6" icon={<LogoutOutlined />}>
                        <a href="/">
                            Salir
                        </a>
                    </Menu.Item>
                    {/*
                    <Menu.Item key="7" icon={<LogoutOutlined />} onClick={(e) => document.getElementById("logoutForm").submit()}>
                        <a href="/panel">
                            Regresar a
                        </a>
                    </Menu.Item>*/}
                </Menu>
            </Sider>
            <Layout>
                <Content style={{ margin: '24px 16px 0' }}>
                    <div className="site-layout-background" style={{padding: 24, minHeight: '100vh'}}>
                        <Trabajadores
                            data={data}
                        />
                    </div>
                </Content>
                <Footer style={{ textAlign: 'center' }}>&copy;{ moment().format('YYYY') } - GRUPO VERFRUT</Footer>
            </Layout>
        </Layout>
    );
};

export default TrabajadoresLayout;

if (document.getElementById("trabajadores-layout")) {
    const element = document.getElementById("trabajadores-layout");
    const props = Object.assign({}, element.dataset)
    ReactDOM.render(<TrabajadoresLayout  {...props}/>, element);
}
