
const citySelector = document.getElementById("city");
const countySelector = document.getElementById("county");
citySelector.addEventListener("change", (event) => {
    event.preventDefault();
    event.stopPropagation();
    let cityCode = citySelector.value;
    axios
        .get('/api/county', {
            params: {
                city_code: cityCode
            }
        })
        .then((response) => {
            let data = response.data.data;
            let htmlText = `<option selected disabled value="">請選擇</option>`;
            Object.entries(data).forEach(([key, value]) => {
                htmlText += `<option value="${key}">${value}</option>`
            });
            countySelector.innerHTML = htmlText;
        })
        .catch((error) => {
            console.error("Error fetching counties data:", error);
        });
});
