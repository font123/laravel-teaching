var li = document.querySelectorAll('#list li img');
				
				    for (var i = 0; i < li.length; i++)
				
				        li[i].onclick = function () {
				
				            for (var i = 0; i < li.length; i++) li[i].className = '';
				          
				            this.src="./images/shouye1.png"
				
				        }
						
				 