var checkboxes=document.querySelectorAll("input[type=checkbox][name=rules]");let enabledSettings=[];checkboxes.forEach((function(e){e.addEventListener("change",(function(){this.value=this.checked?1:0,enabledSettings=Array.from(checkboxes).filter((e=>e.checked)).map((e=>e.value))}))}));