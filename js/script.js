import { cancelConfirm, changeWindow, deleteConfirm } from "./profile.js";
import { ConstManager } from "./Manager.js";

ConstManager.changePasswordButton.addEventListener('click', changeWindow);

ConstManager.changeInfosButton.addEventListener('click', changeWindow);

ConstManager.deleteButton.addEventListener('click', deleteConfirm);

ConstManager.cancelButton.addEventListener('click', cancelConfirm);