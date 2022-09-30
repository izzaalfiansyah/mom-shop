import 'toastr/build/toastr.css';
import toastr from 'toastr';
import axios from 'axios';

export function scrollTop() {
	window.scrollTo(0, 0);
}

export const notif = toastr;

export const http = axios.create({
	baseURL: (window as any).apiURL || 'http://localhost:8000',
	headers: {
		'Content-Type': 'application/json',
		Accept: 'application/json',
	},
});

export function formatMoney(number: any) {
	const prefix = 'Rp.';
	const no = parseInt(number).toLocaleString('id-ID');
	return prefix + no;
}

export const readFile = (file: Blob) =>
	new Promise((resolve, reject) => {
		const reader = new FileReader();
		reader.readAsDataURL(file);

		reader.onload = () => {
			resolve(reader.result);
		};

		reader.onerror = () => {
			reject(reader.error);
		};
	});
