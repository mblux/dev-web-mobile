//Génération des N premers nombres de Fibonacci

#include <stdio.h>
#include <stdlib.h>

int* fibonacci(int n, int* size) {
    if (n == 0) {
        *size = 0;
        return NULL;
    } else if (n == 1) {
        *size = 1;
        int* fib = (int*)malloc(sizeof(int));
        fib[0] = 0;
        return fib;
    } else if (n == 2) {
        *size = 2;
        int* fib = (int*)malloc(2 * sizeof(int));
        fib[0] = 0;
        fib[1] = 1;
        return fib;
    } else {
        *size = n;
        int* fib = (int*)malloc(n * sizeof(int));
        fib[0] = 0;
        fib[1] = 1;
        for (int i = 2; i < n; i++) {
            fib[i] = fib[i - 1] + fib[i - 2];
        }
        return fib;
    }
}

int main() {
    int n;
    printf("Entrez la valeur de n: ");
    scanf("%d", &n);

    int size;
    int* result = fibonacci(n, &size);

    printf("La suite de Fibonacci jusqu'à %d termes: ", n);
    for (int i = 0; i < size; i++) {
        printf("%d ", result[i]);
    }
    printf("\n");

    // Libérer la mémoire allouée
    free(result);

    return 0;
}