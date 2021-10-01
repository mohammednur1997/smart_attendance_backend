﻿/*
 Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.plugins.setLang("a11yhelp", "ro", {title: "Instrucțiuni de accesibilitate", contents: "Cuprins. Pentru a închide acest dialog, apăsați tasta ESC.", legend: [
    {name: "General", items: [
        {name: "Editează bara instrumente.", legend: "Apasă ${toolbarFocus} pentru a naviga prin bara de instrumente. Pentru a te mișca prin grupurile de instrumente folosește tastele TAB și SHIFT-TAB. Pentru a te mișca intre diverse instrumente folosește tastele SĂGEATĂ DREAPTA sau SĂGEATĂ STÂNGA. Apasă butonul SPAȚIU sau ENTER pentru activarea instrumentului."},
        {name: "Dialog editor", legend: "Într-un dialog, apasă TAB pentru a naviga spre câmpul următor de dialog, apasă SHIFT + TAB pentru a te duce la câmpul anterior, apasă ENTER pentru a trimite dialogul, apasă ESC pentru a anula dialogul. Pentru dialoguri care au mai multe subferestre, apasă ALT + F10 pentr a naviga în lista de subferestre. Treci la subferestrea următoare cu TAB sau SĂGEATĂ DREAPTA. Treci la subfereastra anterioară cu SHIFT + TAB sau SĂGEATĂ STÂNGA. Apasă SPAȚIU sau ENTER pentru a selecta subfereastra."},
        {name: "Editor meniu contextual", legend: "Apasă ${contextMenu} sau TASTA MENIU pentru a deschide meniul contextual. Treci la următoarea opțiune din meniu cu TAB sau SĂGEATĂ JOS. Treci la opțiunea anterioară cu  SHIFT+TAB sau SĂGEATĂ SUS. Apasă SPAȚIU sau ENTER pentru a selecta opțiunea din meniu. Deschide sub-meniul opțiunii curente cu SPAȚIU sau ENTER sau SĂGEATĂ DREAPTA. Revino la elementul din meniul părinte cu ESC sau SĂGEATĂ STÂNGA. Închide meniul de context cu ESC."},
        {name: "Editor Casetă Listă",
            legend: "În interiorul unei liste, treci la următorull element cu TAB sau SĂGEATĂ JOS. Treci la elementul anterior din listă cu SHIFT + TAB sau SĂGEATĂ SUS. Apasă SPAȚIU sau ENTER pentru a selecta opțiunea din listă. Apasă ESC pentru a închide lista."},
        {name: "Editor Element Path Bar", legend: "Press ${elementsPathFocus} to navigate to the elements path bar. Move to next element button with TAB or RIGHT ARROW. Move to previous button with  SHIFT+TAB or LEFT ARROW. Press SPACE or ENTER to select the element in editor."}
    ]},
    {name: "Comenzi", items: [
        {name: " Undo command", legend: "Apasă ${undo}"},
        {name: "Comanda precedentă", legend: "Apasă ${redo}"},
        {name: "Comanda Îngroșat", legend: "Apasă ${bold}"},
        {name: "Comanda Inclinat", legend: "Apasă ${italic}"},
        {name: "Comanda Subliniere", legend: "Apasă ${underline}"},
        {name: "Comanda Legatură", legend: "Apasă ${link}"},
        {name: " Toolbar Collapse command", legend: "Press ${toolbarCollapse}"},
        {name: " Access previous focus space command", legend: "Press ${accessPreviousSpace} to access the closest unreachable focus space before the caret, for example: two adjacent HR elements. Repeat the key combination to reach distant focus spaces."},
        {name: " Access next focus space command", legend: "Press ${accessNextSpace} to access the closest unreachable focus space after the caret, for example: two adjacent HR elements. Repeat the key combination to reach distant focus spaces."},
        {name: " Accessibility Help", legend: "Press ${a11yHelp}"}
    ]}
], backspace: "Backspace", tab: "Tab", enter: "Enter", shift: "Shift", ctrl: "Ctrl", alt: "Alt", pause: "Pause", capslock: "Caps Lock", escape: "Escape", pageUp: "Page Up", pageDown: "Page Down", end: "End", home: "Home", leftArrow: "Left Arrow",
    upArrow: "Up Arrow", rightArrow: "Right Arrow", downArrow: "Down Arrow", insert: "Insert", "delete": "Delete", leftWindowKey: "Left Windows key", rightWindowKey: "Right Windows key", selectKey: "Select key", numpad0: "Numpad 0", numpad1: "Numpad 1", numpad2: "Numpad 2", numpad3: "Numpad 3", numpad4: "Numpad 4", numpad5: "Numpad 5", numpad6: "Numpad 6", numpad7: "Numpad 7", numpad8: "Numpad 8", numpad9: "Numpad 9", multiply: "Multiply", add: "Add", subtract: "Subtract", decimalPoint: "Decimal Point", divide: "Divide", f1: "F1", f2: "F2", f3: "F3",
    f4: "F4", f5: "F5", f6: "F6", f7: "F7", f8: "F8", f9: "F9", f10: "F10", f11: "F11", f12: "F12", numLock: "Num Lock", scrollLock: "Scroll Lock", semiColon: "Semicolon", equalSign: "Equal Sign", comma: "Comma", dash: "Dash", period: "Period", forwardSlash: "Forward Slash", graveAccent: "Grave Accent", openBracket: "Open Bracket", backSlash: "Backslash", closeBracket: "Close Bracket", singleQuote: "Single Quote"});