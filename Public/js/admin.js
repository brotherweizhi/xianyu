//单个删除前确认
function del(url){
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
	d.showModal();
}
//批量删除前确认
function delBatch(form){
	var d = dialog({
		skin: 'u2_dialog_blue',
		content: '确认删除吗？',
		ok: function(){
			form.submit();
		},
		okValue: '确定',
		cancel: function(){},
		cancelValue: '取消'
	});
	d.showModal();
	return false;//默认submit按钮见到return false则不会提交表单，并且调用的地方也要加return 函数名
}