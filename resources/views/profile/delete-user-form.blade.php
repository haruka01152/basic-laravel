<x-jet-action-section>
    <x-slot name="title">
        アカウントの削除
    </x-slot>

    <x-slot name="description">
        アカウントを永久に削除します。この操作はやり直しができません。
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
        アカウントが削除されると、そのすべてのリソースとデータは完全に削除されます。アカウントを削除する前に、保持したいデータや情報を保存してください。
        </div>

        <div class="mt-5 text-right">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
            アカウントを削除する
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
            アカウントを削除する
            </x-slot>

            <x-slot name="content">
            アカウントを削除してもよろしいですか？アカウントが削除されると、そのすべてのリソースとデータは完全に削除されます。アカウントを完全に削除することを確認するには、パスワードを入力してください。

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="パスワード"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    キャンセル
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    アカウントを削除する
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
