<x-layout.default>
    <div class="pt-5 grid grid-cols-12">
        <div class="panel col-span-12">
            <h3 class="text-lg font-bold mb-5">ویرایش تیکت</h3>

            {{-- Errors --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-3.5 rounded text-danger bg-danger-light mb-3">
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <form
                action="{{ route('tickets.update', $ticket->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5"
            >
                @csrf
                @method('PUT')

                {{-- معامله + اولویت --}}
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <label for="transaction_id">معامله</label>
                        <select name="transaction_id" id="transaction_id" class="form-select w-full" required>
                            <option value="">انتخاب کنید...</option>
                            @foreach($transactions as $transaction)
                                <option
                                    value="{{ $transaction->id }}"
                                    {{ old('transaction_id', $ticket->ticketable_id) == $transaction->id ? 'selected' : '' }}
                                >
                                    {{ $transaction->name ?? 'معامله #' . $transaction->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label for="priority">اولویت</label>
                        <select name="priority" id="priority" class="form-select w-full" required>
                            @foreach($priorities as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('priority', $ticket->priority) == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label for="status">وضعیت</label>
                        <select name="status" id="status" class="form-select w-full" required>
                            @foreach($statuses as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('status', $ticket->status) == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label for="assigned_to">ارجاع به</label>
                        <select name="assigned_to" id="assigned_to" class="form-select w-full">
                            <option value="">بدون ارجاع</option>
                            @foreach($users as $user)
                                <option
                                    value="{{ $user->id }}"
                                    {{ old('assigned_to', $ticket->assigned_to) == $user->id ? 'selected' : '' }}
                                >
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- موضوع --}}
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <label for="subject">موضوع تیکت</label>
                        <input
                            type="text"
                            name="subject"
                            id="subject"
                            class="form-input w-full"
                            value="{{ old('subject', $ticket->subject) }}"
                            required>
                    </div>

                </div>

                {{-- توضیحات --}}
                <div>
                    <label for="description">توضیحات</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        class="form-textarea w-full"
                    >{{ old('description', $ticket->description) }}</textarea>
                </div>
                <div class="flex flex-col lg:flex-row gap-6">

                    {{-- آپلود فایل --}}
                    <div class="flex-1">
                        <label for="file">آپلود فایل جدید</label>
                        <input
                            type="file"
                            name="file"
                            id="file"
                            class="form-input w-full"
                            accept=".jpg,.jpeg,.png,.pdf"
                        >
                    </div>

                    {{-- لیست فایل‌ها --}}
                    <div class="lg:w-1/2">
                        @if($ticket->medias->count())
                            <div class="grid grid-cols-4 sm:grid-cols-5 gap-4" id="media-list">

                                @foreach($ticket->medias as $media)
                                    <div
                                        class="flex flex-col items-center border rounded p-3 space-y-2 text-center"
                                        id="media-{{ $media->id }}"
                                    >
                                        {{-- آیکون فایل --}}
                                        <div class="text-4xl">
                                            @if(Str::startsWith($media->type, 'image/'))
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                                                </svg>

                                            @elseif($media->type === 'application/pdf')
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                                </svg>

                                            @else
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                                                </svg>

                                            @endif
                                        </div>

                                        {{-- نام فایل --}}
                                        <div class="truncate text-sm" title="{{ $media->name }}">
                                            {{ $media->name }}
                                        </div>

                                        {{-- دکمه‌ها --}}
                                        <div class="flex gap-2 text-xs">
                                            {{-- دانلود --}}
                                            <a
                                                href="{{ $media->url() }}"
                                                target="_blank"
                                                class="px-2 py-1 bg-primary text-white rounded hover:bg-blue-700"
                                            >
                                                دانلود
                                            </a>

                                            {{-- حذف --}}
                                            <button
                                                type="button"
                                                class="px-2 py-1 bg-danger text-white rounded hover:bg-red-700"
                                                onclick="deleteMedia({{ $ticket->id }}, {{ $media->id }})"
                                            >
                                                حذف
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>


                </div>
                <button type="submit" class="btn btn-primary mt-6">
                    ویرایش تیکت
                </button>
            </form>


        </div>
    </div>
    <div x-data="{ show: false, message: '' }" x-show="show"
         x-text="message"
         class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow">
    </div>
    <script>
        function showError(msg) {
            const toast = document.createElement('div');
            toast.innerText = msg;
            toast.className = 'fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
        function deleteMedia(ticketId, mediaId) {
            if (!confirm('آیا از حذف فایل مطمئن هستید؟')) return;

            fetch(`/tickets/${ticketId}/media/${mediaId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (!response.ok) throw new Error('خطا در حذف فایل');
                    return response.json();
                })
                .then(data => {
                    document.getElementById(`media-${mediaId}`)?.remove();
                })
                .catch(error => {
                    alert('حذف فایل با خطا مواجه شد');
                    console.error(error);
                });
        }
    </script>

</x-layout.default>
