import { ConstManager } from "./Manager.js";

export function changeWindow() {
    ConstManager.profileForm.classList.toggle('hidden');
    ConstManager.passwordForm.classList.toggle('hidden');
}

export function deleteConfirm() {
    ConstManager.deleteButton.classList.toggle('hidden');
    ConstManager.deleteConfirmBox.classList.toggle('hidden');
    ConstManager.h1Title.classList.toggle('hidden');
    if (ConstManager.profileForm.classList.contains('hidden')) {
        ConstManager.passwordForm.classList.toggle('hidden');
    } else {
        ConstManager.profileForm.classList.toggle('hidden');
    }
}

export function cancelConfirm() {
    ConstManager.deleteConfirmBox.classList.toggle('hidden');
    ConstManager.deleteButton.classList.toggle('hidden');
    ConstManager.h1Title.classList.toggle('hidden');
    ConstManager.profileForm.classList.toggle('hidden')
}