<x-app-layout>
    <h1 class="text-xl font-semibold">Dashboard Admin</h1>

    <div class="flex flex-col gap-5 mt-10">
        <a href="/admin/user">
            <div class="hover:ring-2 flex flex-col items-center gap-5 justify-center hover:ring-blue-200 border border-gray-300 p-4 rounded-lg hover:cursor-pointer">
                <div class="w-20 h-20">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                    </svg>
                </div>
                <p class="text-2xl font-medium">USER</p>
            </div>
        </a>

        <a href="/admin/penerbangan">
            <div class="hover:ring-2 flex flex-col items-center gap-5 justify-center hover:ring-blue-200 border border-gray-300 p-4 rounded-lg hover:cursor-pointer">
                <div class="w-20 h-20">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
                    </svg>
                </div>
                <p class="text-2xl font-medium">Penerbangan</p>
            </div>
        </a>
    </div>
</x-app-layout>
