declare module '@inertiajs/vue3' {
  import { DefineComponent } from 'vue';

  export type InertiaForm<TForm> = {
    data(): TForm;
    errors: Record<keyof TForm, string>;
    hasErrors: boolean;
    processing: boolean;
    progress: number | null;
    wasSuccessful: boolean;
    recentlySuccessful: boolean;
    
    post(url: string, options?: { onSuccess?: () => void }): void;
    put(url: string, options?: { onSuccess?: () => void }): void;
    patch(url: string, options?: { onSuccess?: () => void }): void;
    delete(url: string, options?: { onSuccess?: () => void }): void;
    get(url: string, options?: { onSuccess?: () => void }): void;
    reset(...fields: (keyof TForm)[]): void;
    clearErrors(...fields: (keyof TForm)[]): void;
    setData(data: Partial<TForm>): void;
    transform(callback: (data: TForm) => object): void;
  };

  export function useForm<TForm extends Record<string, any>>(data: TForm): InertiaForm<TForm>;
  
  export const Head: DefineComponent<{
    title?: string;
  }>;
} 