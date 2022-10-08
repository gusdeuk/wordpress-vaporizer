
var vaposhopDiscountHack = {

	listItems: $('.cont-where-to-buy .call-to-action'),
	linkItem: $('.vaposhop-discount-link'),

	hack: function() {
		this.listItems.each(function(index, elem){
			if(elem.toString().toLowerCase().indexOf("vaposhop") >= 0) {
				vaposhopDiscountHack.linkItem.attr('href', elem.toString());
			}
		});
	},
};

$(document).ready(function(){
	vaposhopDiscountHack.hack();
});