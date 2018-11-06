$(document).ready(function(){
// Acciones iniciales (Default)
	$(".listar").slideUp();
	// Funciones

	$("#btn-crear").click( function() {
		$(".crear").slideUp();
		$(".listar").slideDown();
	});

	$("#btn-listar").click( function() {
		$(".listar").slideUp();
		$(".crear").slideDown();
		$("input, select").prop( "disabled", false);
		$("#btn-guardar-sucursal").prop("disabled", false);
		$("#btn-actualizar-sucursal").prop("disabled", false);
		$("#btn-actualizar-sucursal").addClass("hidden");	
		$("#btn-guardar-sucursal").removeClass("hidden");		
	});

	$('.update').click( function() {
		$(".listar").slideUp();
		$(".crear").slideDown();
		$("#btn-guardar-sucursal").addClass("hidden");	
		$("#btn-actualizar-sucursal").removeClass("hidden");	

	});	

	$('.view').click( function() {
		$(".listar").slideUp();
		$(".crear").slideDown();
		$("input, select").prop( "disabled", true);
		$("#btn-guardar-sucursal").prop("disabled", true);
		$("#btn-actualizar-sucursal").prop("disabled", true);

	});
});