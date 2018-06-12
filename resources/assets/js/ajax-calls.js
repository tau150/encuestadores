$(document).ready(function() {
    function deleteAjax(id, route) {
        swal({
            title: "Seguro de borrar?",
            text: "no se puede deshacer!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
        }).then(result => {
            if (result.value) {
                axios({
                    method: "DELETE",
                    url: `${route}/${id}/`,
                    headers: { "Content-Type": "application/json" }
                })
                    .then(result => {
                        console.log(result);

                        if (result.data === "not allowed") {
                            swal(
                                "No permitido",
                                "No es posible eliminar porque tiene encuestadores asociados.",
                                "error"
                            );
                            return;
                        }
                        swal(
                            "Eliminado!",
                            "El registro fue eliminado.",
                            "success"
                        ).then(result => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        swal(
                            "Error!",
                            "Hubo un error, intente luego.",
                            "danger"
                        );
                    });
            }
        });
    }

    if (window.location.pathname === "/encuestadores") {
        $("#encuestadores-table").dynatable({
            features: {
                paginate: true,
                recordCount: true,
                sorting: false
            },
            inputs: {
                queries: $("#search-activo")
            }
        });
        var dynatable = $("#encuestadores-table").data("dynatable");
        dynatable.process();
    }

    $(".delete-usuario").click(function() {
        var id = $(this).data("identificador");
        deleteAjax(id, "/usuarios");
    });

    $(".delete-encuestador").on("click", function() {
        var id = $(this).data("identificador");
        deleteAjax(id, "/encuestadores");
    });

    $(".delete-encuesta").on("click", function() {
        console.log("asasd");
        var id = $(this).data("identificador");
        deleteAjax(id, "/encuestas");
    });
});
