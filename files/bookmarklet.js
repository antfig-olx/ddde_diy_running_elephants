javascript:(function%20()%20%7B%20%20%20%20%20/*%20IMPORTANT:%20Do%20not%20use%20single%20line%20comments%20in%20this%20script%20or%20double%20quoted%20strings%20(will%20break%20bookmarklet)%20*/%20%20%20%20%20var%20matchUuid%20=%20/%5B0-9a-f%5D%7B8%7D-%5B0-9a-f%5D%7B4%7D-%5B0-9a-f%5D%7B4%7D-%5B0-9a-f%5D%7B4%7D-%5B0-9a-f%5D%7B12%7D/gi;%20%20%20%20%20var%20currentUrl%20=%20window.location.toString();%20%20%20%20%20var%20matches%20=%20matchUuid.exec(currentUrl);%20%20%20%20%20var%20api%20=%20window.location.protocol%20+%20'//'%20+%20window.location.host;%20%20%20%20%20var%20anId;%20%20%20%20%20var%20endpoint;%20%20%20%20%20var%20link;%20%20%20%20%20%20if%20(null%20===%20matches)%20%7B%20%20%20%20%20%20%20%20%20return%20window.alert('Sorry,%20could%20not%20find%20anything%20that%20looked%20like%20an%20identifier%20in%20the%20URL.');%20%20%20%20%20%7D%20%20%20%20%20%20anId%20=%20matches%5B0%5D;%20%20%20%20%20endpoint%20=%20api%20+%20'/developer/event-store/'%20+%20anId;%20%20%20%20%20%20link%20=%20document.createElement('a');%20%20%20%20%20link.setAttribute('href',%20endpoint);%20%20%20%20%20link.setAttribute('style',%20'display:%20none');%20%20%20%20%20link.setAttribute('target',%20'_blank');%20%20%20%20%20document.body.appendChild(link);%20%20%20%20%20link.dispatchEvent(new%20MouseEvent('click',%20%7B'view':%20window,%20'bubbles':%20true,%20'cancelable':%20true%20%7D));%20%7D)();
