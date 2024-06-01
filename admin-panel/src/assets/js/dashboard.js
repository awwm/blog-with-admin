document.addEventListener("DOMContentLoaded", function() {
    var table = document.getElementById("postsTable");
    var headers = table.querySelectorAll("th");

    headers.forEach(function(header) {
        header.addEventListener("click", function() {
            var columnIndex = Array.from(headers).indexOf(header);
            var order = 1;
            if (header.classList.contains("sorted-asc")) {
                order = -1;
            }
            var rows = Array.from(table.querySelectorAll("tbody tr"));
            rows.sort(function(rowA, rowB) {
                var valueA = rowA.children[columnIndex].textContent;
                var valueB = rowB.children[columnIndex].textContent;
                return order * valueA.localeCompare(valueB, undefined, { numeric: true });
            });
            table.querySelector("tbody").innerHTML = "";
            rows.forEach(function(row) {
                table.querySelector("tbody").appendChild(row);
            });
            headers.forEach(function(h) {
                h.classList.remove("sorted-asc", "sorted-desc");
            });
            header.classList.toggle(order === 1 ? "sorted-asc" : "sorted-desc");
        });
    });
});