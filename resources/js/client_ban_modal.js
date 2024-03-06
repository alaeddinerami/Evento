import "./bootstrap";

import "flowbite";

import { Modal } from "flowbite";

let element = document.getElementById("ban-modal");

const modal = new Modal(element);

window.openEditModal = function (id) {
    document.getElementById("ban-modal").action = "http://127.0.0.1:8000/dashboard/client/ban/" + id;
    modal.show();
};