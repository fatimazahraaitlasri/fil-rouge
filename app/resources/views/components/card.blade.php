<div class="card">
    <div x-data="{
        like: {{ $age > 32 ? 'true' : 'false' }},
        country: '',
        sendLike() {
            this.like = !this.like;
            if (!this.search) {
                return;
            }
            fetch('https://restcountries.com/v3.1/name/' + this.search).then(res => res.json()).then(data => {
                this.country = data[0].flags.svg;
                console.log(this.country)
            })
            console.log('liked');
    
        }
    }">
        <span x-text="{{ $age }} + number"></span>

        <button @click="sendLike">like</button>

        <span x-text="like ? 'liked' : 'unliked'"></span>
        <img style="width: 2rem; height:2rem" :src="country" x-show="!!country">
    </div>
</div>
