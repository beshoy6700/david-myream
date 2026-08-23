<script>

window.addEventListener(

    'presentation-started',

    () => {

        setInterval(

            () => {

                Livewire.find(
                    @this.__instance.id
                ).hideMessage();

                setTimeout(

                    () => {

                        Livewire.find(
                            @this.__instance.id
                        ).nextMessage();

                    },

                    1500

                );

            },

            9000

        );

    }

);

</script>
