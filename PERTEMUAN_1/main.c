//* library untuk Bahasa C
#include <stdio.h>

void main(){
    //* Deklarasi variabel
    int nim,a;
    //* Pada bahasa C tidak ada string, jadi pakai char array
    char kom,nama[100];
    float ip;

    //* Print digunakan untuk menampilkan output
    printf("Hello world\n");  //* /n = newline
    printf("Masukkan Nama : ");

    //* gets digunakan untuk menerima inputan dan dapat lebih dari 1 kata
    gets(nama); //* gets = Get String
    printf("Masukkan NIM : ");

    //* scanf = input tanpa spasi, "%d" = tipe data variabelnya, &nim = variabel yg menerima input
    scanf("%d", &nim); 
    printf("Masukkan KOM : ");
    scanf("%c", &kom); 
    printf("Masukkan IP : ");
    scanf("%f", &ip); 

    //* puts = menampilkan output dan menyertakan /n diakhirnya
    printf("Nama : "); puts(nama);
    printf("NIM : %d\n", nim);
    printf("KOM : %c\n", kom);
    printf("IP : %.3f\n", ip);

    //* getch() = getcharacter, menerima input karakter
    printf("Press any button to continue...");
    getch();

}