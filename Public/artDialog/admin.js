// JavaScript Document
function myConfirm(id,url){alert(1);
	var d = dialog({
		skin: 'u2_dialog_blue',
		content: '确认删除吗？',
		ok: function(){
			location.href = url;
		},
		okValue: '确定',
		cancel: function(){},
		cancelValue: '取消'
	});
	d.show();
}