function FormatCountOderAndCat(value){
    if (value > 999){
        return value.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    else{
        return value
    }
}
function FormatProfit(value){
    value = (value * 30) / 100
    if (value > 999) {

        return '฿ ' + value.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }else {
        return '฿ ' + value.toFixed(2)
    }
}
function FormatMoney(value) {
    if (value > 999){
        return '฿ '+value.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    else {
        return '฿ '+value.toFixed(2)
    }
}