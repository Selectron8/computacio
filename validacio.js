document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("productForm");
    const errorSummary = document.getElementById("error-summary");

    form.addEventListener("submit", (event) => {
        // Inicialitzem un llistat d'errors buit
        let errors = [];

        // Obtenir els valors netejant espais en blanc als extrems (.trim())
        const nombre = document.getElementById("nombre").value.trim();
        const descripcion = document.getElementById("descripcion").value.trim();
        const precio = parseFloat(document.getElementById("precio").value);
        const cantidad = parseInt(document.getElementById("cantidad").value, 10);

        // 1. Validació del camp 'nombre' (varchar(20))
        if (nombre === "") {
            errors.push("El nom del producte és obligatori.");
        } else if (nombre.length > 20) {
            errors.push(`El nom és massa llarg (${nombre.length} caràcters). El màxim són 20.`);
        }

        // 2. Validació del camp 'descripcion' (varchar(40))
        if (descripcion === "") {
            errors.push("La descripció del producte és obligatòria.");
        } else if (descripcion.length > 40) {
            errors.push(`La descripció és massa llarga (${descripcion.length} caràcters). El màxim són 40.`);
        }

        // 3. Validació del camp 'precio' (float)
        if (isNaN(precio)) {
            errors.push("El preu ha de ser un número vàlid.");
        } else if (precio <= 0) {
            errors.push("El preu ha de ser superior a 0 €.");
        }

        // 4. Validació del camp 'cantidad' (int)
        if (isNaN(cantidad)) {
            errors.push("La quantitat ha de ser un número enter.");
        } else if (cantidad < 0) {
            errors.push("L'estoc (quantitat) no pot ser un valor negatiu.");
        }

        // Si hi ha errors, evitem que el formulari s'enviï i els mostrem
        if (errors.length > 0) {
            event.preventDefault(); // Atura l'enviament de dades al servidor
            mostrarErrors(errors);
        } else {
            // Tot és correcte, s'amaga el bloc d'errors si s'estava mostrant
            errorSummary.style.display = "none";
        }
    });

    // Funció auxiliar per renderitzar els errors de forma polida
    function mostrarErrors(llistaErrors) {
        errorSummary.innerHTML = ""; // Netegem errors anteriors
        
        const ul = document.createElement("ul");
        llistaErrors.forEach(error => {
            const li = document.createElement("li");
            li.textContent = error;
            ul.appendChild(li);
        });

        errorSummary.appendChild(ul);
        errorSummary.style.display = "block"; // Fem visible el requadre
        
        // Pugem la pantalla automàticament fins a dalt perquè l'usuari vegi els errors
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});