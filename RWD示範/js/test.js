//流程控制
//// Switch ///
let lowType = "B";
    switch(lowType){
        case "A":
            console.log("6000");
            break;
        case "B":
            console.log("4000");
            break;
        default:
            console.log("0");
    }
//// for迴圈 ////
let i;
for(i = 0;i < 10;i++){
    console.log("I Love Javascript!"+(i+1))
}
//// while迴圈 ////
let num=0;
while(num<10){
    console.log("I Love Javascript!"+(num+1))
    num++;
}