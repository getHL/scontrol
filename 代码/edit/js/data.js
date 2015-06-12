

window.onload=function(){

	function ajax (){				//页面动态刷新数据(无闪烁刷新)
		
		$.ajax({
			url:"search.php",
			type:"post",
			contentType:"application/json;charset=utf-8",
			success:function (data){
				if(data){				//将从数据库结收到的数据传给页面
					window.json=JSON.parse(data);
					var input=document.getElementsByTagName("input");
						input[0].value=window.json['switch'];
						input[1].value=window.json['voltage'];
						input[2].value=window.json['current'];
						input[3].value=window.json['time'];
				}

			}
		});
	
	} 

	function ajaxu (){				//修改数据,
		var input=document.getElementsByTagName('input');
			$.ajax({
			url:"update.php",
			type:"post",
			data:{switch:input[0].value,current:input[2].value,voltage:input[1].value,time:input[3].value},
			dataType:"text",
			success:function (data){
				alert(data);
				}

		});
	
	} 
	
window.json="";						//使用了全局变量，方便数据在多个函数内的传送		
ajax();

window.a=setInterval(ajax,10000);	//定时刷新数据(时间间隔为10000ms)
									//使用了全局变量，方便在点击修改按钮后暂停刷新数据
									//点击取消或者保存后继续刷新


	$("#update").click(function(){			//修改选项
		$(this).hide();
		$(".show").show();
		clearInterval(window.a);
		$("input.data").removeAttr("readonly");


		$("input.data").css("border","1px solid black");
	})


	$("#cancle").click(function(){			//取消选项
		var input=document.getElementsByTagName("input");
							//取消时把最后从服务器获取的数据传到对应的数据框(input)中
		input[0].value=window.json['switch'];
		input[1].value=window.json['voltage'];
		input[2].value=window.json['current'];
	//	input[3].value=window.json['time'];
		
		

		$("input.data").attr("readonly","readonly");
		$("input.data").css("border","none");
		$(".show").hide();
		$("#update").show();
		window.a=setInterval(ajax,10000);
		


	})


	$("#save").click(function(){				//保存选项

		ajaxu();
		$("input.data").attr("readonly","readonly");
		$("input.data").css("border","none");
		$(".show").hide();
		$("#update").show();
		window.a=setInterval(ajax,10000);	
	})


}