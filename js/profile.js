import { ConstManager } from "./Manager.js";

export function changeWindow() {
    ConstManager.profileForm.classList.toggle('hidden');
    ConstManager.passwordForm.classList.toggle('hidden');
}