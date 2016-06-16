function columnDel(id){
	scscms_alert("确定删除该栏目吗？","confirm",function(){
		$.ajax({
	        url     : columnDelUrl,
	        type    : 'post',
	        data    : {'id':id},
	        success : function(data){
	        	if(data == 1){
	        		window.location.href = columnListUrl;
	        	}else{
	        		scscms_alert("删除失败，请重试","error");
	        	}
	        }
        });
	});
}

function column_order(){
    var data   = new Array();
    $('.column-order input:text').each(function(i){
        var order_data  = new Object();
        order_data.column_order = $(this).val();
        data[i] = order_data;

    });
    $('.column-order input:hidden').each(function(i){
        var cid_data  = new Object();
        cid_data = $(this).val();
        data[i].cid = cid_data;
    });
    var json_data = "data=" + JSON.stringify(data);

    $.ajax({
        url     : columnOrderUrl,
        type    : 'post',
        data    : json_data,
        success : function(data){
            if(data == 1){
                window.location.href = columnListUrl;
            }
        }
    });
}

function changeStatus(id){
	var str = $('#status'+id+' >span');
	if(str.html() == '开启'){
		var status = 0;
	}else{
		var status = 1;
	}
	$.ajax({
	    url     : columnChangeStatus,
	    type    : 'post',
	    data    : {
	    	'id'     : id,
	    	'status' : status
	    },
	    success : function(data){
	    	if(data.ret == 1){
	    		if(data.status == 0){
	    			str.removeClass('status-open');
		            str.html("关闭");
	    		}else{
	    			str.addClass('status-open');
		            str.html("开启");
	    		}
	    	}else{
	    		scscms_alert("修改失败，请重试","error");
	    	}
	    }
    });
}

function articleAdd(){
	var title    = $('#title').val();
	var author   = $('#author').val();
	var describe = $('#describe').val();
	var time     = $('#time').val();
	var content  = $('.summernote').code();
	var aid      = $('#aid').val();
	var path     = $('#type-img').val();

	if(title != ""){
		$.ajax({
		    url     : articleAddUrl,
		    type    : 'post', 
		    data    : {
		    	'title'    : title,
		    	'author'   : author,
		    	'describe' : describe,
		    	'time'     : time,
		    	'aid'      : aid,
		    	'path'     : path,
		    	'content'  : content
		    },
		    success : function(data){
		    	if(data == 1){
		    		window.location.href = articleListUrl;
		    	}else{
		    		scscms_alert("添加失败，请重试","error");
		    	}    	
		    }
	    });
	}
}

function articleAddDrafts(){
	var title    = $('#title').val();
	var author   = $('#author').val();
	var describe = $('#describe').val();
	var time     = $('#time').val();
	var content  = $('.summernote').code();
	var aid      = $('#aid').val();

	if(title != ""){
		$.ajax({
		    url     : articleAddDraftsUrl,
		    type    : 'post', 
		    data    : {
		    	'title'    : title,
		    	'author'   : author,
		    	'describe' : describe,
		    	'time'     : time,
		    	'aid'      : aid,
		    	'content'  : content
		    },
		    success : function(data){
		    	if(data == 1){
		    		window.location.href = draftsListUrl;
		    	}else{
		    		scscms_alert("添加失败，请重试","error");
		    	}    	
		    }
	    });
	}
}

function articleDel(arid){
	scscms_alert("确定删除该文章吗？","confirm",function(){
		$.ajax({
	        url     : articleDelUrl,
	        type    : 'post',
	        data    : {'arid':arid},
	        success : function(data){
	        	if(data == 1){
	        		window.location.href = articleListUrl;
	        	}else{
	        		scscms_alert("删除失败，请重试","error");
	        	}
	        }
        });
	});
}

function articleEdit(id){
	var title    = $('#title').val();
	var author   = $('#author').val();
	var describe = $('#describe').val();
	var time     = $('#time').val();
	var content  = $('.summernote').code();
	var path     = $('#type-img').val();
	var aid      = $('#aid').val();

	$.ajax({
	    url     : articleEditUrl,
	    type    : 'post',
	    data    : {
	    	'arid'     : id,
	    	'title'    : title,
		    'author'   : author,
		    'describe' : describe,
		    'time'     : time,
		    'content'  : content,
		    'path'     : path,
		    'aid'      : aid
	    },
	    success : function(data){
	    	if(data == 0){
	    	    scscms_alert("修改失败，请重试","error");
	    	}else{
	    		window.location.href = data;
	    	}
	    }
    });
}

function articleTypeDel(aid){
	scscms_alert("确定删除该分类吗？","confirm",function(){
		$.ajax({
	        url     : typeDelUrl,
	        type    : 'post',
	        data    : {'aid':aid},
	        success : function(data){
	        	if(data == 1){
	        		window.location.href = typeListUrl;
	        	}else{
	        		scscms_alert("删除失败，请重试","error");											
	        	}
	        }
        });
	});
}

function draftsDel(arid){
	scscms_alert("确定删除该文章吗？","confirm",function(){
		$.ajax({
	        url     : articleDelUrl,
	        type    : 'post',
	        data    : {'arid':arid},
	        success : function(data){
	        	if(data == 1){
	        		window.location.href = draftsListUrl;
	        	}else{
	        		scscms_alert("删除失败，请重试","error");
	        	}
	        }
        });
	});
}


function commentDel(cid,href){
	scscms_alert("确定删除该评论吗？","confirm",function(){
		$.ajax({
	        url     : commentDelUrl,
	        type    : 'post',
	        data    : {'cid':cid},
	        success : function(data){
	        	if(data == 1){
	        		if(href == 'new'){
	        			window.location.href = commentNewUrl;
	        		}else if(href == 'wait'){
	        			window.location.href = commentWaitUrl;
	        		}
	        	}else{
	        		scscms_alert("删除失败，请重试","error");
	        	}
	        }
        });
	});
}

function serializeAdd(){
	var name        = $('#name').val();
	var describe    = $('#describe').val();
	var create_time = $('#create_time').val();

	if(name != ""){
		$.ajax({
		    url     : serializeAddUrl,
		    type    : 'post', 
		    data    : {
		    	'name'        : name,
		    	'create_time' : create_time,
		    	'describe'    : describe,
		    },
		    success : function(data){
		    	if(data == 1){
	        		window.location.href = serializeUrl;
	        	}else{
	        		scscms_alert("创建失败，请重试","error");
	        	}	
		    }
	    });
	}
}

function serializeDel(sid){
	scscms_alert("确定删除该连载吗？","confirm",function(){
		$.ajax({
		    url     : serializeDelUrl,
		    type    : 'post',
	        data    : {'sid':sid},
		    success : function(data){
		        if(data == 1){
		        	window.location.href = serializeUrl;
		        }else{
		        	scscms_alert("删除失败，请重试","error");
		        }
		    }
	    });
	});
}

function serializeArticleRemove(sid, arid){
	scscms_alert("确定将该文章移除本连载吗？","confirm",function(){
		$.ajax({
		    url     : serializeArticleRemoveUrl,
		    type    : 'post',
	        data    : {
	        	'sid' : sid,
	        	'arid': arid
	        },
		    success : function(data){
		    	if(data == 0){
		    		scscms_alert("移除失败，请重试","error");
		    	}else{
		    		window.location.href = data;
		    	}
		    }
	    });
	});
}

function serializeArticleAdd(sid){
	var arid = $('#arid').val();

	$.ajax({
		url     : serializeArticleAddUrl,
		type    : 'post',
	    data    : {
	        'sid' : sid,
	        'arid': arid
	        },
		success : function(data){
			if(data == 0){
		    	scscms_alert("添加失败，请重试","error");
		    }else{
		    	window.location.href = data;
		    }
	    }
	});
}

function jottingAdd(){
	var author   = $('#author').val();
	var time     = $('#time').val();
	var content  = $('.summernote').code();
	var path     = $('#type-img').val();

	$.ajax({
		url     : jottingAddUrl,
		type    : 'post',
		data    : {
			'author'   : author,
			'time'     : time,
			'path'     : path,
			'content'  : content
		},
		success : function(data){
			if(data == 1){
				window.location.href = jottingListUrl;
			}else{
				scscms_alert("添加失败，请重试","error");
			}
		}
	});
}

function jottingAddDrafts(){
	var author   = $('#author').val();
	var time     = $('#time').val();
	var content  = $('.summernote').code();
	var path     = $('#type-img').val();

	$.ajax({
		url     : jottingAddDraftsUrl,
		type    : 'post',
		data    : {
			'author'   : author,
			'time'     : time,
			'path'     : path,
			'content'  : content
		},
		success : function(data){
			if(data == 1){
				window.location.href = jottingDraftsListUrl;
			}else{
				scscms_alert("添加失败，请重试","error");
			}
		}
	});
}

function jottingDel(jid){
	scscms_alert("确定删除该随笔吗？","confirm",function(){
		$.ajax({
			url     : jottingDelUrl,
			type    : 'post',
			data    : {'jid':jid},
			success : function(data){
				if(data == 1){
					window.location.href = jottingListUrl;
				}else{
					scscms_alert("删除失败，请重试","error");
				}
			}
		});
	});
}

function jottingDraftsDel(jid){
	scscms_alert("确定删除该随笔吗？","confirm",function(){
		$.ajax({
			url     : jottingDelUrl,
			type    : 'post',
			data    : {'jid':jid},
			success : function(data){
				if(data == 1){
					window.location.href = jottingDraftsListUrl;
				}else{
					scscms_alert("删除失败，请重试","error");
				}
			}
		});
	});
}

function jottingEdit(jid){
	var author   = $('#author').val();
	var time     = $('#time').val();
	var content  = $('.summernote').code();
	var path     = $('#type-img').val();

	$.ajax({
		url     : jottingEditUrl,
		type    : 'post',
		data    : {
			'jid'      : jid,
			'author'   : author,
			'time'     : time,
			'content'  : content,
			'path'     : path,
		},
		success : function(data){
			if(data == 0){
				scscms_alert("修改失败，请重试","error");
			}else{
				window.location.href = data;
			}
		}
	});
}

function shareAdd() {
	var author     = $('#author').val();
	var time_stamp = $('#time_stamp').val();
	var describe   = $('#describe').val();
	var id         = $('#id').val();
	var code       = $('#code').val();
	var path       = $('#path').val();

	$.ajax({
		url     : shareAddUrl,
		type    : 'post',
		data    : {
			'author'    : author,
			'time_stamp': time_stamp,
			'describe'  : describe,
			'code'      : code,
			'id'        : id,
			'path'      : path
		},
		success : function(data){
			if(data == 1){
				window.location.href = shareListUrl;
			}else{
				scscms_alert("添加失败，请重试","error");
			}
		}
	});
}

function shareDel(sid){
	scscms_alert("确定删除该资源吗？","confirm",function(){
		$.ajax({
			url     : shareDelUrl,
			type    : 'post',
			data    : {'sid':sid},
			success : function(data){
				if(data == 1){
					window.location.href = shareListUrl;
				}else{
					scscms_alert("删除失败，请重试","error");
				}
			}
		});
	});
}

function shareTypeDel(id){
	scscms_alert("确定删除该分类吗？","confirm",function(){
		$.ajax({
			url     : shareTypeDelUrl,
			type    : 'post',
			data    : {'id':id},
			success : function(data){
				if(data == 1){
					window.location.href = shareTypeListUrl;
				}else{
					scscms_alert("删除失败，请重试","error");
				}
			}
		});
	});
}

function autoResponseSave(){
	var type    = $('div[class = "tab-pane active"]').attr("id");
	var content = $('.summernote').code();
	$.ajax({
		url     : autoResponseSaveUrl,
		type    : 'post',
		data    : {
			'content': content,
			'type'   : type
		},
		success : function(data){
			if(data == 1){
				scscms_alert("操作成功，请重试","ok");
			}else{
				scscms_alert("操作失败，请重试","error");
			}
		}
	});
}

function autoResponseDel(){
	$.ajax({
		url     : autoResponseDelUrl,
		type    : 'post',
		success : function(data){
			debugger
			if(data == 1){
				scscms_alert("操作成功，请重试","ok");
			}else{
				scscms_alert("删除失败，请重试","error");
			}
		}
	});
}