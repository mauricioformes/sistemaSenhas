/* http://keith-wood.name/countdown.html
   Brazilian initialisation for the jQuery countdown extension
   Translated by Marcelo Pellicano de Oliveira (pellicano@gmail.com) Feb 2008.
   and Juan Roldan (juan.roldan[at]relayweb.com.br) Mar 2012. */
(function($) {
	$.countdown.regional['pt-BR'] = {
		labels: ['Anos', 'Meses', 'Semanas', 'D', 'H', 'M', 'S'],
		labels1: ['Ano', 'M�s', 'Semana', 'D', 'H', 'M', 'S'],
		compactLabels: ['a', 'm', 's', 'd'],
		whichLabels: null,
		digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
		timeSeparator: ':', isRTL: false};
	$.countdown.setDefaults($.countdown.regional['pt-BR']);
})(jQuery);
