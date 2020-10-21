(() => {

    const SECOND = 1000;
    const MINUTE = SECOND*60;
    const HOUR = MINUTE*60;
    const DAY = HOUR*24;

    function setElementInnerText(id,text){
        const element = document.getElementById(id);
        element.innerText = text;
    }

    function countDown() {
        const now = new Date().getTime();
        const working = new Date('2020-10-3').getTime();
        const unixTineLeft = working - now;

        setElementInnerText('days', Math.floor(unixTineLeft/DAY));
        setElementInnerText('hours', Math.floor(unixTineLeft%DAY/HOUR));
        setElementInnerText('minutes', Math.floor(unixTineLeft%HOUR/MINUTE));
        setElementInnerText('seconds', Math.floor(unixTineLeft%MINUTE/SECOND));
    }

    function run(){
        
        countDown();
        setInterval(countDown, SECOND);
    }
    run();

    
})();
