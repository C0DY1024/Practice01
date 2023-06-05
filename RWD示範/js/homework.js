///第一題///
let num1;
for(num1=0;num1<16;num1++){
    if(num1%2==0){
        console.log(num1 + " is even");
    }else{
        console.log(num1 + " is odd");
    }
}
///第二題///
let num2;
for(num2=0;num2<10;num2++){
        console.log("("+ num2 +","+(18-num2)+")");
}
///第三題///
var x = 0;
while(true){
    x++
    if(x%7==3 && x%9==4 && x%10==2 && x%11==1){
        console.log(x);
        break;
    }
}
///第四題///
let star = '';
for(let i=0 ; i<5 ; i++) {
    let space = '';
    
    for(let j=0 ; j<(6-i) ; j++) {
        space += " ";
    }

    star += '*'
    console.log(space + star)
}
