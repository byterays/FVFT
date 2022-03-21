const loadStates = (country_id) => {
    console.log('helo')
    fetch(appurl + "ajax/states", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            _token: _token,
            country_id: country_id,
        }),
    })
        .then((res) => res.json())
        .then((json) => {
            // console.log(json);
            states = json;
            $("#select-state").empty();
            json.forEach((state) => {
                // console.log(state);
                let selection = "";
                if (state_id == state.id) {
                    selection = "selected";
                }
                $("#select-state").append(
                    `<option value="${state.id}" ${selection}>${state.name}</option>`
                );
            });
            loadCities($("#select-state").val());
            loadDistricts($("#select-state").val());
        });
};
const loadCities = async (state_id) => {
    fetch(appurl + "ajax/cities", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            _token: _token,
            state_id: state_id,
        }),
    })
        .then((res) => res.json())
        .then((json) => {
            cities = json;
            $("#select-city").empty();
            json.forEach((city) => {
                let selection = "";
                if (city_id == city.id) {
                    selection = "selected";
                }
                // console.log(state);
                $("#select-city").append(
                    `<option value="${city.id}" ${selection}>${city.name}</option>`
                );
            });
        });
};
const loadDistricts = async (state_id) => {
    fetch(appurl + "ajax/districts", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            _token: _token,
            state_id: state_id,
        }),
    })
        .then((res) => res.json())
        .then((json) => {
            districts = json;
            $("#districts").empty();
            json.forEach((district) => {
                let selection = "";
                if (district_id == district.id) {
                    selection = "selected";
                }
                $("#districts").append(
                    `<option value="${district.id}" ${selection}>${district.name}</option>`
                );
            });
        });
};



const getDistricts = (state_id) => {
    console.log(state_id);
    fetch(appurl + "ajax/districts", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            _token: _token,
            state_id: state_id,
        }),
    })
        .then((res) => res.json())
        .then((json) => {
            // console.log(json);
            districts = json;
            $("#districts").empty();
            json.forEach((district) => {
                // console.log(district);
                let selection = "";
                if (district_id == district.id) {
                    selection = "selected";
                }
                $("#districts").append(
                    `<option value="${district.id}" ${selection}>${district.name}</option>`
                );
            });
            // loadCities($("#select-state").val());
        });
};

const patchStates = (obj) => {
    loadStates(obj.value);
};
const patchCities = (obj) => {
    loadCities(obj.value);
};
const patchDistricts = (obj) => {
    loadDistricts(obj.value);
}
const patchGetDistricts = (obj) => {
    getDistricts(obj.value);
}
$(document).ready(function () {
    loadStates($("#select-country").val());
});
