"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const module = document.querySelector("#module");
    // module.addEventListener("change", loadPhrase);
    $(module).on("change", loadPhrase);

    loadPhrase();
});

async function loadPhrase() {
    const code = document.querySelector("#code").value;

    const data = { code: code, module: module.value };
    const params = new URLSearchParams(data).toString();
    const url = `${module.dataset.url}?${params}`;

    try {
        const response = await fetch(url, {
            method: "GET",
            headers: { Accept: "application/json" },
        });

        const data = await response.json();

        if (!response.ok) {
            data.message ? swalAlert(data.message, "error") : "";
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const tableBody = document.querySelector("#phrases-table tbody");
        tableBody.innerHTML = "";

        Object.entries(data.phrases).forEach(([key, value], index) => {
            const newRow = tableBody.insertRow();
            newRow.innerHTML = `
                <td>${index + 1}</td>
                <td>${key}</td>
                <td><input type="text" class="form-control" name="phrases[${key}]" value="${value}" /></td>
            `;
        });
    } catch (error) {
        console.error("Error:", error);
    }
}
