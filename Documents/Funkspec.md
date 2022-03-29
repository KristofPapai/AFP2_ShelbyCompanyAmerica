# AFP2_ShelbyCompanyAmerica
## Funkcionális Specifikáció
------------------------------
## Fejlesztők:
  - Pápai Kristóf Levente
  - Beregszászi Bence
  - Banyik Nándor
## Senior:
  - Bencsik Krisztián Dániel
------------------------------
## Áttekintés:
Megrendelőnk egy multifunkciós E-learning rendszert igényelt melyben Különböző kurzusokat vehet fel a felhasználó és ide tölthetnek fel anyagokat az oktatók. Emellett lehetőség lesz a jövőben arra hogy quiz-eket és egyéb tudás tesztelő funkciókkal bővítsük a weboldalt.

------------------------------
## Jelenlegi helyzet:
Megrendelőnk szeretne egy modern, könnyen használható E-learning rendszert amely segitségével sok papírt és időt spórolhat. Emellet egy jegyek egyszerű vezetését szeretné a papíralap helyett. Egyszerűen tudnak majd a tanárok létrehozni új kurzusokat és akár vizsgákat is.

------------------------------

## Követelménylista:
| Modul  | Id | Név | Kifejtés |
| ------------- | ------------- | ------------- | -------------|
| Main Page(PRE-LOGIN) | MPR1  | Login page | A felhasznló képes legyen bejelentkezni az oldalra |
| Main Page(PRE-LOGIN) | MPR2  | Register page | A regisztrációt biztosító felület elkészítése |
| Main Page(PRE-LOGIN) | MPR3  | Jelszó emlékeztető | Elfelejtett jelszó esetén jelszó emlékeztető küldése email-re |
| Main Page(POST-LOGIN) | MPO1  | Main MainPage | A Main Pagen lesz elérhető a funkciók zöme egy egyszerű letisztult menürendszerben. |
| Main Page(POST-LOGIN-USER)  | MPOU1  | Kurzusaid listázása | Szükséges egy menüpont ahol az aktív kurzusait a felhasználónak ki kell listázni |
| Main Page(POST-LOGIN-USER)  | MPOU2  | Oktatói profilra Váltás | Szükséges egy menüpont ahol ha aktyv oktatói profiunk van át tudunk váltani rá. |

------------------------------
## Jelenlegi üzleti folyamatok modellje
A Mylearning egy non-profit szervezet által lett fejlesztve. Az oldal rendelkezni fog Donate funkciókkal de ez a szerver fedezetére fog elmenni. Célunk hogy a diákok részére egy könnyen kezelhető, egyszerű rendszert biztosítsunk.

------------------------------

## Igényelt üzleti folyamatok
Egy igényes letisztult felületet szeretnénk. Bejelentkezős és Regisztrációs felületeket is áljanak rendelkezésre. emellet szükséges egy Főoldal ahol elérhető az összes menürendszer mely fontos a felhasználó számára.

------------------------------

## Használati esetek
A weboldalunkat elsősorban iskolások/egyetemisták fogják használni. Emellet a kutatók és tanároknak is biztosítva lesz felület tananyagok, kutatások megosztásához.  

------------------------------
## Képernyő tervek

- Bejelentkezés


![Bejelentkezés](https://imgur.com/kyo8TOL.png)

- Regisztráció


![Bejelentkezés](https://i.imgur.com/750iHEJ.png)

------------------------------

## Forgatókönyv

Tanuló szemszögéből: A bejelentkezési képernyő fogadja a tanulót. Ha nincs fiókja akkor be tud regisztrálni a regisztrációs hiperlink megnyomásával. Ha van fiókja akkor csak egyszerűen beírja a Neptunkódját és a jelszavát. Ha esetleg elfelejtette a jelszavát kérhet helyreállítást a jelszó helyreállító hiperlink segítségével. 

------------------------------

##Fogalomszótár

- E-learning - Weboldalon létrehozott digitális tananyagok tárhelye

- Donate - Adományozás (A weboldalon lehet pénz formátumban segíteni a szervezetet, a szerver fentarthatóságával kapcsolatban)