// JavaScript Document
function myConfirm(id,url){alert(1);
	var d = dialog({
		skin: 'u2_dialog_blue',
		content: 'ȷ��ɾ����',
		ok: function(){
			location.href = url;
		},
		okValue: 'ȷ��',
		cancel: function(){},
		cancelValue: 'ȡ��'
	});
	d.show();
}