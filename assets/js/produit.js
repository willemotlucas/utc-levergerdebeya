function calculate_price(value, price)
{
	var total = parseFloat(value.value) * parseFloat(price);
	var element = document.getElementById('prix_total');
	if(isNaN(total))
		element.innerHTML = '';
	else
		element.innerHTML = total;
}