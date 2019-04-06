

    var lunhui = {
        //成功弹出层
        success: function (message, url) {
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg(message, {icon: 1, time: 2000}, function (index) {
                    layer.close(index);
                    window.location.href = url;
                });
            });

        },

        // 错误弹出层
        error: function (message) {
            layui.use('layer', function(){
				var layer = layui.layer;
				layer.msg(message, {icon: 2, time: 2000}, function (index) {
					layer.close(index);
				});
            });
        },

        // 确认弹出层
        confirm: function (id, url) {
            layui.use('layer', function(){
            	var layer = layui.layer;
				layer.confirm('确认删除此条记录吗?', {icon: 3, title: '提示'}, function (index) {
					$.get(url, {'id': id}, function (res) {
						if (res.status == 'success') {
							layer.msg(res.msg, {icon: 1, time: 1500, shade: 0.1});
							//Ajaxpage()
						} else {
							layer.msg(res.msg, {icon: 0, time: 1500, shade: 0.1});
						}
					});
					layer.close(index);
				})
            })
        },

        //状态
        status: function (id, url) {
            $.post(url, {id: id}, function (data) {
                if (data.code == 1) {
                    var a = '<span class="label label-danger">禁用</span>'
                    $('#zt' + id).html(a);
                    layui.use('layer', function() {
                        var layer = layui.layer;
                        layer.msg(data.msg, {icon: 2, time: 1500, shade: 0.1,});
                    })
                    return false;
                } else {
                    var b = '<span class="label label-info">开启</span>'
                    $('#zt' + id).html(b);
                    layui.use('layer', function() {
                        var layer = layui.layer;
                        layer.msg(data.msg, {icon: 1, time: 1500, shade: 0.1,});
                        return false;
                    })
                }
            });
            return false;
        }

    }

