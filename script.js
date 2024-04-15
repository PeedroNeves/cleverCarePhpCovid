
document.addEventListener("DOMContentLoaded", function () {

    fetch("/api/getLastAccess")
        .then(response => response.json())
        .then(data => {
            const lastAccessDate = new Date(data.access_datetime);
            const formattedDate = lastAccessDate.toLocaleString(); // Format the date as needed

            // Update the footer with the retrieved data
            document.getElementById("lastAccessDate").textContent = formattedDate;
            document.getElementById("lastAccessCountry").textContent = data.chosen_country;
        })
        .catch(error => console.error("Erro ao buscar dados:", error));
});
