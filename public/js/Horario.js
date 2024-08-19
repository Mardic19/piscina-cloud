document.addEventListener("DOMContentLoaded", function () {
    const turnoSelect = document.getElementById("Turno");
    const inicioInput = document.getElementById("HInicio");
    const finalInput = document.getElementById("HFinal");

    turnoSelect.addEventListener("change", function () {
        inicioInput.value = "";
        finalInput.value = "";
    });

    inicioInput.addEventListener("change", function () {
        const selectedTurno = turnoSelect.value;
        const startTime = new Date(`01/01/2022 ${inicioInput.value}`);
        const validStartTime = selectedTurno === "Mañana" ? new Date(`01/01/2022 06:00`) : new Date(`01/01/2022 12:00`);
        const validEndTime = selectedTurno === "Mañana" ? new Date(`01/01/2022 11:00`) : new Date(`01/01/2022 17:00`);

        if (startTime < validStartTime || startTime > validEndTime) {
            alert("La hora de inicio no es válida para el turno seleccionado");
            inicioInput.value = "";
        } else if (finalInput.value) {
            checkEndTime();
        }
    });

    finalInput.addEventListener("change", function () {
        const selectedTurno = turnoSelect.value;
        const endTime = new Date(`01/01/2022 ${finalInput.value}`);
        const validStartTime = selectedTurno === "Mañana" ? new Date(`01/01/2022 06:00`) : new Date(`01/01/2022 12:00`);
        const validEndTime = selectedTurno === "Mañana" ? new Date(`01/01/2022 11:00`) : new Date(`01/01/2022 17:00`);

        if (endTime < validStartTime || endTime > validEndTime) {
            alert("La hora final no es válida para el turno seleccionado");
            finalInput.value = "";
        } else {
            checkEndTime();
        }
    });

    function checkEndTime() {
        const startTime = new Date(`01/01/2022 ${inicioInput.value}`);
        const endTime = new Date(`01/01/2022 ${finalInput.value}`);

        if (startTime >= endTime) {
            alert("La hora final debe ser posterior a la hora de inicio");
            finalInput.value = "";
        }
    }
});
