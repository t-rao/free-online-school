$('form.news_letter').on('submit', function(){

    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data ={};

that.find('[name]').each(function(index, value){
var that = $(this),
name = that.attr('name'),
value = that.val();

data[name]=value;

});



$.ajax({
url:url,
type:type,
data:data,
success:function(response){
    if(response == 1){
        $(".news_letter"). trigger("reset")
        alert("Form submitted success fully");
    }else{
        alert("Some thing went wrong, please try again");
    }
}
});

return false;
})