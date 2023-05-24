<script>
    const flower = document.querySelector("#flower");
    const base = document.querySelector("#base");
    const packaging = document.querySelector("#packaging");


    const flowersChoices = document.querySelectorAll("#flower_choice");

    flowersChoices.forEach((e) => {
        e.addEventListener('click',function(){
            flower.textContent = this.getAttribute('data-value');
        })
    })

    const baseChoices = document.querySelectorAll("#base_choice");

    baseChoices.forEach((e) => {
        e.addEventListener('click',function(){
            base.textContent = this.getAttribute('data-value');
        })
    })

    const packagingChoices = document.querySelectorAll("#packaging_choice");

packagingChoices.forEach((e) => {
    e.addEventListener('click',function(){
        packaging.textContent = this.getAttribute('data-value');
    })
})



</script>