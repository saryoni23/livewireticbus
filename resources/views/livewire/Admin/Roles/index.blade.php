<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <x-slot name="slot">


        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dolore blanditiis minima quisquam
                    natus accusamus adipisci quis dolorum reprehenderit omnis eius obcaecati perferendis cupiditate,
                    aliquam laudantium accusantium nemo? Consequatur tenetur officia perferendis, molestias saepe ipsa
                    aliquid, modi, alias nesciunt quisquam neque pariatur. Sint atque consequuntur dolor nesciunt magnam
                    natus laborum provident cupiditate aperiam, vel voluptatibus, enim esse unde necessitatibus quidem
                    ipsum mollitia ad quaerat odio fuga quae, totam molestiae itaque! Aliquid tenetur quo, totam sint
                    eos debitis delectus? Reprehenderit eveniet eius commodi accusamus neque repellendus, quasi officia
                    nisi quidem optio at adipisci quia deserunt modi, deleniti sunt quibusdam accusantium? Neque?</p>
            </div>
        </div>

    </x-slot>

    <script>
        export default {
            props: ['roles'],

        }

    </script>

</x-admin-layout>
