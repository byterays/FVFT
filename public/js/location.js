const loadStates=(country_id)=>{
    fetch(appurl+'ajax/states', {
        method: 'POST',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            {
            _token:_token,
            country_id:country_id
        })
    }).then(res=>res.json()).then(json=>{
        // console.log(json);
        states=json;
        $("#select-state").empty();
        json.forEach(state => {
            // console.log(state);
            let selection="";
            if(state_id==state.id){
                selection="selected";
            }
            $("#select-state").append(`<option value="${state.id}" ${selection}>${state.name}</option>`);
        });
        loadCities($("#select-state").val())
    })
}
const loadCities=async (state_id)=>{
    fetch(appurl+'ajax/cities', {
        method: 'POST',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            {
                _token:_token,
                state_id:state_id
            })
    }).then(res=>res.json()).then(json=>{
        cities=json;
        $("#select-city").empty();
        json.forEach(city => {
            let selection="";
                if(city_id==city.id){
                    selection="selected";
                }
            // console.log(state);
            $("#select-city").append(`<option value="${city.id}" ${selection}>${city.name}</option>`);
        });
    })
}
const patchStates=(obj)=>{
    loadStates(obj.value);
}
const patchCities=(obj)=>{
    loadCities(obj.value);
}
$(document).ready(function() {
    loadStates($("#select-country").val());
});