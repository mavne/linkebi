function changeper(a,i)
{
	if(!a){ a = 'false'; }
	$.post( "http://links.404.ge/allowed/change_permition", { allowed: a, idx: i }, function( data ) {
		location.reload();
	});
}