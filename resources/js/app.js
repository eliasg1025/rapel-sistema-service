/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import ReactDOM from "react-dom";
import React from "react";
import AgregarCuenta from "./components/Cuentas/AgregarCuenta";

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');
require('./components/Login');
require('./layouts/MainLayout');
require('./layouts/TrabajadoresLayout');
require('./layouts/UsuariosLayout');
require('./layouts/RegistroIndividualLayout');
require('./layouts/RegistroMasivoLayout');
require('./components/Cuentas/AgregarCuenta');
require('./components/Cuentas/TablaCuentas');
require('./components/Cuentas/TablaCuentasAdmin');


if (document.getElementById("agregar-cuenta")) {
    const element = document.getElementById("agregar-cuenta");
    const props = Object.assign({}, element.dataset)
    ReactDOM.render(<AgregarCuenta {...props} />, document.getElementById("agregar-cuenta"));
}
