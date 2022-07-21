<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cadastro</title>

    <!-- FONTE DO GOOGLE -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body class="container mx-auto px-4 py-8 bg-gray-50">
    <div class="container">
        <form method="POST">
    
            @csrf
            <section class="h-screen">
            
                <div class="container px-6 py-12 h-full">
                  <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                    <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                      <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full"
                        alt="Phone image"
                      />
                    </div>
                    <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
    
                        <form method="POST">
                            @csrf

                            {{-- chamando os alerts de succeso e erro para exibir no formulario --}}
                            @include('includes-tailwindcss.validations-form')
                            <!-- name input -->
                            <div class="mb-6">
                                <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Digite seu nome"
                                />
                            </div>
    
                            <!-- email input -->
                            <div class="mb-6">
                            <input
                                type="text"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Digite seu e-mail"
                            />
                            </div>
    
                            <!-- Password input -->
                            <div class="mb-6">
                            <input
                                type="password"
                                name="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Digite sua senha"
                            />
                            </div>
    
                             {{-- <!-- Password_confirm input -->
                             <div class="mb-6">
                                <input
                                    type="password"
                                    name="password_confirm"
                                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    placeholder="Confirme sua senha"
                                />
                            </div> --}}
                
                            <div class="flex justify-between items-center mb-6">
                                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out">
                                    Já possui um cadastro? Faça o login
                                </a>
                            </div>
                
                            <button
                            type="submit"
                            class="mt-3 inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="light"
                            >
                                Cadastrar
                            </button>  
                        
                        </form>
                    </div>
                  </div>
                </div>
            </section>
        </form>
    </div>
    <script src="/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>



