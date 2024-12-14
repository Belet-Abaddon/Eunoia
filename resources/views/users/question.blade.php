<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @include('users.user-header')
    <div class="container mx-auto p-6">
        <header class="text-center mb-10">
            <h1 class="text-4xl font-bold text-cyan-700 mb-4">{{ $phychotherapyType->name }}</h1>
            <p class="text-base sm:text-lg text-gray-600">{{ $phychotherapyType->description }}</p>
        </header>

        <form action="{{ route('questions.submit') }}" method="POST"
            class="w-[70%] mx-auto space-y-8 bg-white p-8 rounded-xl shadow-xl">
            @csrf

            @foreach ($questions as $question)
                <div class="border-b pb-6">
                    <h3 class="text-xl font-semibold text-cyan-700 mb-4">{{ $question->question }}</h3>

                    <div class="mt-4 flex justify-center">
                        <div class="grid grid-cols-10 gap-4 w-1/2">
                            @for ($i = 1; $i <= 10; $i++)
                                <label class="flex items-center justify-center space-x-2 cursor-pointer">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $i }}"
                                        class="text-cyan-500 focus:ring-2 focus:ring-cyan-500 transition-all duration-300" required>
                                    <span class="text-lg font-medium text-gray-700">{{ $i }}</span>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach

            <input type="hidden" name="phychotherapy_type_id" value="{{ $phychotherapyType->id }}">
            <div class="text-center mt-8">
                <button type="submit"
                    class="bg-cyan-600 hover:bg-cyan-700 text-white text-lg font-semibold px-8 py-4 rounded-full transition-all duration-300 ease-in-out transform hover:scale-105">
                    Submit
                </button>
            </div>
        </form>

    </div>
    <footer class="bg-gray-800 text-gray-200 py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 PsycH Testing Online. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
