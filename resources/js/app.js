import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { initMotion, animate } from './motion';

/**
 * Contact form without a backend: builds the email and opens the visitor's
 * email app through mailto:. Nothing is sent to the server.
 * Labels come from config/content.php (contact.form).
 *
 * Query parameters from the route planner (?origin=&destination=&mode=&service=)
 * prefill the service and message.
 */
Alpine.data('contactForm', ({ email, whatsapp, subject, labels, prefill }) => ({
    form: { name: '', company: '', email: '', phone: '', service: '', message: '' },
    sent: false,
    via: 'email',

    init() {
        const params = new URLSearchParams(window.location.search);
        const origin = params.get('origin');
        const destination = params.get('destination');

        if (params.get('service')) this.form.service = params.get('service');
        if (origin && destination) {
            this.form.message = [
                `${prefill.route}: ${origin} ${prefill.to} ${destination}`,
                params.get('mode') ? `${prefill.mode}: ${params.get('mode')}` : null,
                '',
                '',
            ].filter((line) => line !== null).join('\n');
        }
    },

    send() {
        const f = this.form;
        const fullSubject = [subject, f.service, f.name].filter(Boolean).join(' | ');
        const body = [
            `${labels.name}: ${f.name}`,
            `${labels.company}: ${f.company}`,
            `${labels.email}: ${f.email}`,
            `${labels.phone}: ${f.phone}`,
            `${labels.service}: ${f.service}`,
            '',
            f.message,
        ].join('\n');

        if (this.via === 'whatsapp' && whatsapp) {
            window.open(`https://wa.me/${whatsapp}?text=${encodeURIComponent(`${fullSubject}\n\n${body}`)}`, '_blank', 'noopener');
        } else {
            window.location.href = `mailto:${email}?subject=${encodeURIComponent(fullSubject)}&body=${encodeURIComponent(body)}`;
        }
        this.sent = true;
    },
}));

/**
 * Interactive route card on the home page: pick origin, destination and mode,
 * then continue to the contact page with the route prefilled.
 */
Alpine.data('routePlanner', ({ origins, destinations, modes: modeSets, contactUrl, services }) => ({
    origins,
    destinations,
    origin: origins[0],
    destination: destinations[0],
    mode: (destinations[0].domestic ? modeSets.domestic : modeSets.international)[0],
    openList: null,

    toggle(list) {
        this.openList = this.openList === list ? null : list;
    },

    choose(list, value) {
        this[list] = value;
        this.openList = null;
        // Keep the same mode when the new destination offers it, otherwise pick the first
        if (!this.modes.some((m) => m.label === this.mode.label)) this.mode = this.modes[0];
        this.$nextTick(() => this.animateRoute());
    },

    setMode(mode) {
        this.mode = mode;
        this.$nextTick(() => this.animateRoute());
    },

    get isDomestic() {
        return Boolean(this.destination.domestic);
    },

    get modes() {
        return this.isDomestic ? modeSets.domestic : modeSets.international;
    },

    get modeIcon() {
        return this.mode.icon;
    },

    get quoteUrl() {
        const params = new URLSearchParams({
            origin: this.origin,
            destination: this.destination.name,
            mode: `${this.isDomestic ? 'Domestic' : 'Export and import'} ${this.mode.label.toLowerCase()}`,
            service: this.isDomestic ? services.domestic : services.international,
        });
        return `${contactUrl}?${params}`;
    },

    animateRoute() {
        if (!this.$refs.traveller) return;
        animate(this.$refs.traveller, { left: ['0%', '50%'] }, { duration: 1.4, ease: [0.65, 0, 0.35, 1] });
        animate(this.$refs.summary, { opacity: [0.3, 1], y: [6, 0] }, { duration: 0.5 });
    },
}));

Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();

initMotion();
