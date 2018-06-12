/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

$(document).ready(function () {
    function deleteAjax(id, route) {
        swal({
            title: "Seguro de borrar?",
            text: "no se puede deshacer!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
        }).then(function (result) {
            if (result.value) {
                axios({
                    method: "DELETE",
                    url: route + "/" + id + "/",
                    headers: { "Content-Type": "application/json" }
                }).then(function (result) {
                    console.log(result);

                    if (result.data === "not allowed") {
                        swal("No permitido", "No es posible eliminar porque tiene encuestadores asociados.", "error");
                        return;
                    }
                    swal("Eliminado!", "El registro fue eliminado.", "success").then(function (result) {
                        location.reload();
                    });
                }).catch(function (error) {
                    swal("Error!", "Hubo un error, intente luego.", "danger");
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

    $(".delete-usuario").click(function () {
        var id = $(this).data("identificador");
        deleteAjax(id, "/usuarios");
    });

    $(".delete-encuestador").on("click", function () {
        var id = $(this).data("identificador");
        deleteAjax(id, "/encuestadores");
    });

    $(".delete-encuesta").on("click", function () {
        console.log("asasd");
        var id = $(this).data("identificador");
        deleteAjax(id, "/encuestas");
    });
});

/***/ })

/******/ });